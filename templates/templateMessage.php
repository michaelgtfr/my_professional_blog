<!DOCTYPE html>
    <html>
        <head>
        	<meta charset="utf-8">
        	<title>message</title>
        	<style>
        	@font-face
			{
 				font-family: 'broken_heartregular';
    			src: url('../police/broken/broken_heart-webfont.eot');
    			src: url('../police/broken/broken_heart-webfont.eot?#iefix') format('embedded-opentype'),
         		url('../police/broken/broken_heart-webfont.woff') format('woff'),
         		url('../police/broken/broken_heart-webfont.ttf') format('truetype'),
         		url('../police/broken/broken_heart-webfont.svg#broken_heartregular') format('svg');
    			font-weight: normal;
    			font-style: normal;
			}

        	.banner
			{
				background-color: red;
				opacity: 0.5;
				color: white;
				background-size: 100%;
				font-family: 'broken_heartregular', sans serif;
				color: gray;
				text-align: center;
				font-size: 1em;
				text-shadow: 5px 5px 10px black ;
			}

			</style>
        </head>

    	<body>
    		<section>
    			<div class="banner">
                    <div>
                        <p><img src="/img/logoblogdeux.jpg" alt="logo du site" width="20%" height="20%" /></p>
                    </div>
                    <div>
                        <h1>Cocoworking<br />blog</h1>
                    </div>
                </div>
    		</section>
            <section>
    		    <?= $content; ?>
            </section>
    	</body>
    </html>