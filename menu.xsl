<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
                <title>Menu XSL</title>
            </head>
            <body>
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <xsl:value-of select="menu/@title"/>
                </button>
                <div class="dropdown-menu">
                    <xsl:for-each select="menu/menuitem">
                               <xsl:element name="a">
                                    <xsl:attribute name="href">
                                        <xsl:value-of select="link"/>
                                    </xsl:attribute>
                                    <span><xsl:value-of select="title"/></span>
                                </xsl:element>
                                <br/>
                    </xsl:for-each>
                </div>
              </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>