#include <stdio.h>
#include <stdint.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/mman.h>

typedef void* TFT;

#define PAGE_SIZE    4096

// get one page, system memory map by page number.
// call munmap to free alloced mem.
unsigned char *mmap_page(unsigned int page)
{
	int fd = -1;
	unsigned char *mem = NULL;

	fd = open("/dev/mem", O_RDWR);
	if(fd < 0)
		return NULL;

	mem = (unsigned char *)mmap(0, PAGE_SIZE,
	    PROT_READ | PROT_WRITE, MAP_SHARED, fd, page * PAGE_SIZE);
	close(fd);

	return mem;
}

inline void reg_write(unsigned char *h, unsigned int value)
{
	*((unsigned int *)h) = value;
}

inline unsigned int reg_read(unsigned char *h)
{
	return *((unsigned int *)h);
}

void tft_transfer(TFT h)
{
	// enable cs1 spi.
	reg_write(h + 0x38, 0x2);

	// start transfer.
	reg_write(h + 0x00, 0x100);

	// write until spi is not busy anymore.
	while (reg_read(h + 0x00) & 0x10000)
		;

	// disable cs1 spi.
	reg_write(h + 0x38, 0);
}

inline void tft_write_cmd(TFT h, unsigned int val)
{
	reg_write(h + 0x04, val);
	tft_transfer(h);
}

inline void tft_write_data(TFT h, unsigned int val)
{
	reg_write(h + 0x04, val | (1 << 8));
	tft_transfer(h);
}

TFT tft_open(int speed)
{
	unsigned char *mem = NULL;
	unsigned int pos = 0, page = 0;
	unsigned int addr = 0x10000b00;		// spi address.
	unsigned int reg;

	page = addr / PAGE_SIZE;
	pos = addr % PAGE_SIZE;

	mem = mmap_page(page);
	if(mem == NULL)
		return NULL;
	mem += pos;

	// set spi speed to 193.3333M / (191 + 2) = 1000KHz, and cpol = 1, cpha = 1
	reg = reg_read(mem + 0x28);
	reg_write(mem + 0x28, reg & 0xf000ffcf | (speed << 16) | 0x30);

	// command or data is same 9bits.
	reg_write(mem + 0x2c, 9 << 24);
	return mem;
}

void tft_close(TFT h)
{
	munmap(h, PAGE_SIZE);
}

int main(int argc, char *argv[])
{
	TFT h;
	int i, j, speed;

	printf("usage: tft [color:r/g/b] [speed]\n");

	speed = (argc != 3 ? 191 : atoi(argv[2]));
	h = tft_open(speed);
	if (h == NULL)
		return -1;

	tft_write_cmd(h, 0x01);
	tft_write_cmd(h, 0x11);
	tft_write_cmd(h, 0x29);
	tft_write_cmd(h, 0x2c);

	if (argc == 1 || argv[1][0] == 'b') {
		for (i = 0; i < 480; i++) {
			for (j = 0; j < 320; j++) {
				tft_write_data(h, 0xf8);
				tft_write_data(h, 0x00);
				tft_write_data(h, 0x00);
			}
		}
	} else if (argv[1][0] == 'g') {
		for (i = 0; i < 480; i++) {
			for (j = 0; j < 320; j++) {
				tft_write_data(h, 0x00);
				tft_write_data(h, 0xf8);
				tft_write_data(h, 0x00);
			}
		}
	} else {
		for (i = 0; i < 480; i++) {
			for (j = 0; j < 320; j++) {
				tft_write_data(h, 0x00);
				tft_write_data(h, 0x00);
				tft_write_data(h, 0xf8);
			}
		}
	}

	tft_close(h);
}
