<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Page Not Found | NorthPoint Protection</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

    <style>
        
        @import url('https://fonts.googleapis.com/css?family=Raleway|Nunito');

        *{
            padding: 0;
            margin: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        html, body{
            width: 100vw;
            height: 100vh;
            font-family: 'Nunito', sans-serif;
        }

        .error-full-page{
            display: flex;
            flex-wrap: wrap;
            width: 100vw;
            height: 100vh;
        }

            .error-content{
                width: 40%;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

                 @media(max-width:880px){
                    .error-content{
                        width: 100%;
                        height: 50vh;
                    }
                }

                .error-content-inner{
                    padding: 0 40px;
                }

                    .error-content-inner:after{
                        content: '';
                        width: 100px;
                        display: block;
                        height: 4px;
                        top: 10px;
                        position: relative;
                        border-bottom: solid 4px rgb(64, 72, 79);
                    }

                    .error-content-inner .image-wrap{
                        width: 70%;
                        margin-bottom: 10px;
                    }

                    .error-content-inner .image-wrap img{
                        width: 100%;
                        height: auto;
                    }

                    .error-content-inner h1{
                        margin-bottom: 5px;
                    }

                    .error-content-inner p{
                        font-size: 1.2em;
                    }

            .error-image{
                width: 60%;
                height: 100vh;
                background-image: url("{{ asset('images/coins-2.jpg') }}");
                background-size: cover;
                position: relative;
            }

                 @media(max-width:880px){
                    .error-image{
                        width: 100%;
                        height: 50vh;
                    }
                }

                .error-image:before{
                    content: '';
                    width: 100%;
                    height: 100%;
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    background: rgba(64, 72, 79, 0.6);
                }

    </style>
    
</head>
<body>

    <div class='error-full-page'>
        <div class='error-content'>
            <div class='error-content-inner'>
                <div class='image-wrap'>
                    <img src="{{ asset('images/logo.png') }}" alt='NorthPoint Protection' title='NorthPoint Protection' />
                </div>
                <h1>Sorry, Page Not Found</h1>
                <p>Sorry, the page you requested could not be found</p>
            </div>
        </div>
        <div class='error-image'></div>
    </div>

</body>
</html>