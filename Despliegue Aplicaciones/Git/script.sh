#!/bin/bash

# 1. Install Git
sudo yum install git -y

# Check Git version
git --version

# 2. Configure Git
git config --global user.name "odps"
git config --global user.email "odps31@gmail.com"
git config --global core.editor nano
git config -l

# 3. Create a repository
mkdir -p documento/dibujo documento/imagen documento/texto
touch documento/dibujo/dibujo1 documento/imagen/noimagen1 documento/texto/text1 documento/texto/text2
cd documento
git init
ls -a
git status
git add *
git commit -m "documentos version 0"

# 4. Modifications
echo "texto" >> texto/text2
touch dibujo/dibujo2
git status
git add *

# 5. Delete a file
rm dibujo/dibujo1
git status
git restore --staged text2
git commit -m "borrado dib1, añadido dib2"

# 6. Modify a commit
git add text2
git commit -m "version v.1 de text2"
echo "se me olvido" >> text2
git commit --amend --no-edit

# 7. Rename a file
git mv dibujo/dibujo2 dibujo/dibujo-bueno
git commit -m "renombrado dibujo"

# 8. Ignore images
touch imagen/imagen.jpg
touch .gitignore
echo "*.jpg" >> .gitignore
cat .gitignore
git commit -a -m "Creada lista de ignorados"

# 9. Show commit history
git log -p -3
