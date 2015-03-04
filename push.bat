call git add .
call git commit -m %1


call git push origin master
call git remote add origin https://github.com/ferranvb/enllasos.git
rem call git push -u origin master