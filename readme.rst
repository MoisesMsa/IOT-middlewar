##IOT middlware




//ajeitou problema de permissão dos arquivos
sudo /sbin/restorecon -R /var/www/

//resolver o problema do mongodb driver no fedora
setsebool -P httpd_can_network_connect on


