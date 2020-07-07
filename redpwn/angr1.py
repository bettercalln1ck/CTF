import angr

proj=angr.Project("/home/nikhil/Pictures/CTF/redpwn/SMarT-solver",load_options={'auto_load_libs':False})
state = proj.factory.entry_state()
sim = proj.factory.simulation_manager(state)
#path_group = proj.factory.path_group(threads=4)
sim.explore(find=(0x400000+0x0122f20,), avoid=(0x400000+0x011b9ac,))
print(sim.found[0].posix.dumps(0))
