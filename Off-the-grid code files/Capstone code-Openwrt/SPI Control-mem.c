mem 0x10000b28 bit
mem 0x10000b28 0xe02e8884
//Rest register is similar, set 0x10000b2c
mem 0x10000b2c bit
mem 0x10000b2c 0x01000018
//command length (cmd_bit_cnt) to 1bit, 
//mosi bit (mosi_bit_cnt) to 24bits. 
//0x04 set to 1, 
mem 0x10000b04 bit
mem 0x10000b04 0x00000001
//0x08 set to 0x12345678 
mem 0x10000b08 bit
mem 0x10000b08 0x12345678
(we set data length to 24bits, so spi will only send 0x345678 in 0x78, 0x56, 0x34 order).



//enable chip select for spi 1. (0x38 register set to 0x02)
//mem 0x10000b38 bit
mem 0x10000b38 0x00000000
//start transfer. (0x00 register spi_master_start bit:8)
mem 0x10000b00 bit
mem 0x10000b00 0x00160101
//wait data transfer done. (0x00 register spi_master_busy bit:16)
mem 0x10000b00 0x00170001
//disable chip select spi 1. (0x38 register set back to 0)

mem 0x10000b38 0x00000002


