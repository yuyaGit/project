#!/bin/sh
command="/usr/local/bin/hydra -L usr.lst -P pass.lst $1 telnet" 
eval $command