# dobzinski-ocsplugins2csv
Third party resource for exports OCS Invetory Plugins data to CSV

# Problem:
On OCS by Menu "Search with various criteria", when One data (Hardware) for Multiple data (Wingroups Plugin). The result on this OCS Menu, retrieve the data just One to One.

# Workaround:
1. Create the "csv" folder in /var/www/html/;
2. Run git clone for this repository, and move all php files to the new folder;
3. Edit var.php and inform all values to MySQL or MariaDB, and check the modules variable;
4. If do have another module, create a new file "yourmodule2csv.php", develop for export CSV format, and edit download.php to insert your new file in the "switch/case".

# Item in Menu:
1. Edit the /usr/share/ocsinventory-reports/ocsreports/require/html_header.php and add a new line 70, as below:
```
68             if (isset($_SESSION['OCS']["loggeduser"]) && !isset($protectedGet["popup"])) {
69                 echo '<ul class="nav nav navbar-nav navbar-right">';
70                 echo "<li><a href='/csv/' style=\"background-color: #961B7E !important; font-weight: bold !important; color: #ffffff !important;\" target=\"_blank\">CSV</a></li>";
71                 if (isset($_SESSION['OCS']["TRUE_mesmachines"])) {
```

# Extra:
If do you whant to tntegrate the login with LDAP/AD with a Security Group:

1. Install Ldap module for Apache:
```
# dnf install mod_ldap
```
2. Create a new file: /etc/httpd/conf.d/csv.conf
```
<Location /csv>
    AuthType Basic
    AuthBasicProvider ldap
    AuthLDAPURL "ldap://SERVER_LDAP:389/OU=base,DC=domain,DC=com?sAMAccountName?sub?(objectClass=user)" NONE
    AuthLDAPBindDN "USER_LDAP"
    AuthLDAPBindPassword "PASSWORD_LDAP"
    AuthUserFile /dev/null
    AuthName "Network Auth"
    AuthLDAPGroupAttributeIsDN on
    require ldap-group CN=groupname,OU=groups,OU=base,DC=domain,DC=com
</Location>
```
3. Test your config:
```
# apachectl configtest
Syntax OK
```
4. Restart or Reload Apache:
```
# systemctl reload|restart httpd
```
