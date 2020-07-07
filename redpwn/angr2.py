import angr,claripy
import sys,time
import logging
#from termcolor import colored

logging.getLogger('cle.loader').setLevel('ERROR')

begin=time.time()
proj=angr.Project("/home/nikhil/Pictures/CTF/redpwn/SMarT-solver")
state=proj.factory.entry_state(add_options={angr.options.LAZY_SOLVES})
simulation = proj.factory.simgr(state)


def success(state):
    output = state.posix.dumps(1)
    return bytes('Correct input!','utf-8') in output

def failed(state):
    output=state.posix.dumps(1)
    return bytes('Sorry, that is not the correct input','utf-8') in output

simulation.explore(find=success, avoid=failed)

if simulation.found:
    print(simulation.found[0].posix.dumps(0))
