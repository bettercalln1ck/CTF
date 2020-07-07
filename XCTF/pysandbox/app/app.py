from flask import Flask, request

app = Flask(__name__)


@app.route('/', methods=["POST"])
def security():
    print(request.form)
    secret = request.form["cmd"]
    for i in secret:
        if not 42 <= ord(i) <= 122:
        	print(i)
        	return "error!"

    k=exec(secret)
    print(k)
    return k 


if __name__ == '__main__':
    app.run(host="0.0.0.0")
    
    
#\x70\x72\x69\x6e\x74\x20\x6f\x70\x65\x6e\x28\x27\x66\x6c\x61\x67\x2e\x74\x78\x74\x27\x29\x2e\x72\x65\x61\x64\x28\x29
#\x70\x72\x69\x6e\x74\x28\x27\x68\x69\x27\x29
#x70x72x69x6ex74x28x27x68x69x27x29  
