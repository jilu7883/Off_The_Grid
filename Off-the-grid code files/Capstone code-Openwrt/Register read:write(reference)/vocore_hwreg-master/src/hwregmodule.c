#include <Python/Python.h>
#include "registers_utils.h"


int wait_for_data;
float power=0.0;
static PyObject * MemError;




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


void bit_print(size_t const size, void const * const ptr)
{

    unsigned char *b = (unsigned char*) ptr;
    unsigned char byte;
    int i, j;
    int num=(size*8)-1;



    for (i=size-1;i>=0;i--)
    {
        for (j=7;j>=0;j--)
        {
            byte = (b[i] >> j) & 1;
            printf("%d : %d   ",num, byte);
            num--;

            //break;
        }
        puts("\n");
    }

}
static PyObject *
hwreg_write_reg(PyObject *self, PyObject * args){

	unsigned int pos=0 , page =0;
	unsigned int addr,value;
	unsigned char *mem = NULL;

	if(!PyArg_ParseTuple(args, "II", &addr, &value))
		return NULL;

	page = addr / PAGE_SIZE;
	pos = addr % PAGE_SIZE;
	mem = mmap_page(page);
	if(mem == NULL) {
		printf("can not map memory.\n");
		PyErr_SetString(MemError, "can not map memory.");
		return NULL;
	  }

	*((unsigned int *)(mem + pos)) = value;

	munmap(mem, PAGE_SIZE);

	return PyInt_FromLong(1);

}

static PyObject *
hwreg_write_reg_bit(PyObject *self, PyObject * args){

	unsigned int pos=0 , page =0;
	unsigned int addr,bitNum,bitValue;
	unsigned char *mem = NULL;

	if(!PyArg_ParseTuple(args, "III", &addr, &bitNum,&bitValue))
		return NULL;

	//printf("bit value: %u \n",bitValue);

	page = addr / PAGE_SIZE;
	pos = addr % PAGE_SIZE;
	mem = mmap_page(page);
	if(mem == NULL) {
		printf("can not map memory.\n");
		PyErr_SetString(MemError, "can not map memory.");
		return NULL;
	  }

	//
	if(bitValue==0){
		//printf("bit %d clear in register 0x%08X \n", bitNum, addr );
		*((unsigned int *)(mem + pos)) &= ~(1<<bitNum);
	}else{
		//printf("bit %d set in register 0x%08X \n", bitNum, addr );
		*((unsigned int *)(mem + pos)) |=  (1<<bitNum);
	}



	munmap(mem, PAGE_SIZE);

	return PyLong_FromLong(1);

}



static PyObject *
hwreg_read_reg(PyObject *self, PyObject * args){

	unsigned int pos=0 , page =0;
	unsigned int addr;
	volatile unsigned int value;
	unsigned char *mem = NULL;

	if(!PyArg_ParseTuple(args, "I", &addr))
		return NULL;

	page = addr / PAGE_SIZE;
	pos = addr % PAGE_SIZE;
	mem = mmap_page(page);
	if(mem == NULL) {
		printf("can not map memory.\n");
		PyErr_SetString(MemError, "can not map memory.");
		return NULL;
	  }


	value=*((unsigned int *)(mem + pos));

	munmap(mem, PAGE_SIZE);

	return PyLong_FromLong(value);

}


static PyObject *
hwreg_read_reg_bit(PyObject *self, PyObject * args){

	unsigned int pos=0 , page =0;
	unsigned int addr,bitNum,bitValue;
	volatile unsigned int value;
	unsigned char *mem = NULL;

	if(!PyArg_ParseTuple(args, "II", &addr,&bitNum))
		return NULL;

	page = addr / PAGE_SIZE;
	pos = addr % PAGE_SIZE;
	mem = mmap_page(page);
	if(mem == NULL) {
		printf("can not map memory.\n");
		PyErr_SetString(MemError, "can not map memory.");
		return NULL;
	  }

	value=*((unsigned int *)(mem + pos));

	bitValue=((value >> (bitNum)) & 1);

	munmap(mem, PAGE_SIZE);

	return PyLong_FromLong(bitValue);

}


PyMODINIT_FUNC
inithwreg(void)
{
	PyObject *m;
	static PyMethodDef MemMethods[] = {
		{"write", hwreg_write_reg, METH_VARARGS, "Set register value"},
		{"write_bit", hwreg_write_reg_bit, METH_VARARGS, "Sets register bit value"},
		{"read",hwreg_read_reg, METH_VARARGS, "Reads register value"},
		{"read_bit",hwreg_read_reg_bit, METH_VARARGS, "Reads register bit value"},
		{NULL, NULL, 0, NULL}
	};
	m = Py_InitModule("hwreg", MemMethods);
	if ( m == NULL )
		return;

	MemError = PyErr_NewException("mem.error", NULL, NULL);
	Py_INCREF(MemError);
	PyModule_AddObject(m, "error", MemError);
}

int
main(int argc, char *argv[])
{
	Py_SetProgramName(argv[0]);
	Py_Initialize();
	inithwreg();
	wait_for_data=hwreg_read_reg("10000060",16);	//read in current value, change address accordingly
	while(1){
	hwreg_write_reg("10000b38",2);//start ADC conversion
	while(wait_for_data){
		wait_for_data=hwreg_read_reg("10000060",16);
		printf("waiting");
	}
	power=wait_for_data*2.5/16384;
	printf("power measurement:%f",power);//print result
  //hwreg_write_reg(int("10000000",power))//store power result in register
	//hwreg_write_reg(int("10000000",somevalue))//Change VSWR, change register accordingly
}
	return 0;
}
