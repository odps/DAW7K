#!/bin/bash

# 1. Install Git
sudo yum install git -y

# 2. Configure Git
git config --global user.name "odps"
git config --global user.email "odps31@gmail.com"
git config --global core.editor nano

# 3. Create a repository
cd ~
mkdir -p documento/dibujo documento/imagen documento/texto
touch documento/dibujo/dibujo1 documento/imagen/noimagen1 documento/texto/text1 documento/texto/text2
cd documento
echo "Voy a ser eliminado v.0" >> dibujo/dibujo1
echo "Esto no es una imagen v.0" >> imagen/noimagen1
echo "Esto es text1 v.0" >> texto/text1
echo "Esto es text2 v.0" >> texto/text2
git init
git commit -a -m "Documentos version 0"

# 4. Modifications
echo "Estamos modificando para obtener v.1" >> texto/text2
touch dibujo/dibujo2
git add *

# 5. Delete a file
rm dibujo/dibujo1
git restore --staged texto/text2
git commit -m "Borrado dibujo1, añadido dibujo2"

# 6. Modify a commit
git add texto/text2
git commit -m "Version v.1 de text2"
echo "Se me olvido agregar esto en el ultimo commit" >> texto/text2
git commit --amend --no-edit

# 7. Rename a file
git mv dibujo/dibujo2 dibujo/dibujo-bueno
git commit -m "Renombrado dibujo"

# 8. Ignore images
touch imagen/imagen.jpg
touch .gitignore
echo "*.jpg" >> .gitignore
git commit -a -m "Creada lista de ignorados"

# 9. Show commit history
git log -p -3
