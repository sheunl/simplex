# Simplex 
### Simplex is a simple site generator with minimal templating to allow you work in HTML freely.

## Commands
start - initial startup. Run to create *src* directory.
build - generate static files
clean - clear build directory
rebuild - clean directory and regenerate files

e.g: php simplex *command*

## Template
1. Add a link - {{@*link* | *name to display*}}
2. Add an image from static folder - {{#image_r| *path.to.image.ext* | *width*  }}
3. Add a remote image - {{#image_r| *url* | *width*  }}
4. Add a script from static folder - {{#script | *path.to.script.ext* }}
5. Add a remote script - {{#script_r | *url* }}