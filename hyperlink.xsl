<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
                <title>Hyperlink XML XSL</title>
            </head>
            <body>
                <div class="alert alert-light" align="center">
                    <p>Loving the design? Try it put for yourself! Visit:
                    <xsl:element name="a">
                        <xsl:attribute name="href">
                            <xsl:value-of select="root/link/@xlink:href"/>
                        </xsl:attribute>
                    <span><xsl:value-of select="root/link"/></span>
                    </xsl:element></p>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>