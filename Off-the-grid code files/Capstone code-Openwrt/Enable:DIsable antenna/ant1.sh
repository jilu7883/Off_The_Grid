#!/bin/sh

# change_byte [input file name] [byte position] [value of byte]
change_byte() {
  dd if=$1 of=/tmp/cbtmpf bs=1 count=$2;
  echo -ne "\x$3" >> /tmp/cbtmpf;
  let "pos=$2+1";
  dd if=$1 of=/tmp/cbtmpf bs=1 skip=$pos seek=$pos
  mv /tmp/cbtmpf $1
}

cp /dev/mtd2 /tmp/mtd2
change_byte /tmp/mtd2 52 11
mtd -e factory write /tmp/mtd2 factory
wifi
