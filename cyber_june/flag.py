import socket
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("159.203.81.45",2346))
s.recv(47*13-1)


flag=""
while(True):
	x=s.recv(2)
	flag+=x
	print x
	s.send(str(x))
#	print flag

print flag
