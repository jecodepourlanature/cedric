#!/bin/bash

cat >propel.xml << EOF
<?xml version="1.0" encoding="ISO-8859-1" standalone="no"?>
<config>
    <propel>
        <paths>
            <!-- The directory where Propel expects to find your schema.xml file. -->
            <schemaDir>./</schemaDir>
            <!-- The directory where Propel should output generated object model classes. -->
            <phpDir>src</phpDir>
        </paths>

        <database>
            <connections>
                <connection id="default">
                    <adapter>$DATABASE_TYPE</adapter>
                    <dsn>$DATABASE_DSN</dsn>
                    <user>$DATABASE_USER</user>
                    <password>$DATABASE_PASSWORD</password>
                    <settings>
                        <charset>utf8</charset>
                    </settings>
                </connection>
            </connections>
        </database>
    </propel>
</config>
EOF

if [ "$1" == "install_only" ]; then
	echo "exit (install_only)"
	exit 0;
else
	vendor/bin/propel config:convert
	/usr/local/bin/boot
fi
