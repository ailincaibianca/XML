<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
                <title>Data</title>
            </head>
            <body>
                <table class="table table-bordered table-light">
                    <thead>
                        <tr class="thead-light">
                            <th>Image</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="root/date">
                            <tr class="table-warning">
                                <td>
                                    <img src="{image}" class="img-thumbnail" width="200px"/>
                                </td>
                                <td>
                                    <xsl:value-of select="name"/>
                                </td>
                                <td>
                                    <div style="pointer-events:none;">
                                    <a href="#">Edit</a>
                                    </div>
                                </td>
                                <td>
                                     <div style="pointer-events:none;">
                                    <a href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>