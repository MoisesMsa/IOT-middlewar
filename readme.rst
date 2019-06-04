db.createUser(
  {
    user: "iot",
    pwd: "iot@2019",
    roles: [
       { role: "read", db: "iot" },
    ]
  }
)


//ajeitou probelma de permissão de arquivo
sudo /sbin/restorecon -R /var/www/

//resolver o problema do driver no fedora
setsebool -P httpd_can_network_connect on


