from pwn import *

r=connect('159.203.81.45',2346)

print(r.recv())
stra=''
while(1):
    a=r.recvline()
    print(a)
    r.send(str(a))
    stra+=str(a[0])
    print(stra)
print(stra)    
