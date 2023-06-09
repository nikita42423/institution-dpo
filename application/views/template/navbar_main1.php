<style>
:root {
    /* Base font size */
    /* Full grid area variable */
    --fullGrid: 1 / 1 / -1 / -1;
}

body {
    font-family: "Montserrat", Arial, sans-serif;
    background-color: #fcfcfc;
}

header {
    /* Create grid spanning viewport width & height */
    display: grid;
    grid-template-rows: 100vh;
    overflow: hidden;
    box-shadow: 0 0.2em 0.5em rgba(0, 0, 0, 0.5);
}

.video-bg {
    /* Span the full grid */
    grid-area: var(--fullGrid);

    /* Re-size video to cover full screen while maintaining aspect ratio */
    min-width: 100%;
    min-height: 100%;
    object-fit: cover;

    /* Display video below overlay */
    z-index: -1;
}

.video-bg::-webkit-media-controls {
    display: none !important;
}

.video-overlay {
    /* Span the full grid */
    grid-area: var(--fullGrid);

    /* Center Content */
    display: grid;
    justify-content: center;
    /* align-content: center; */
    /* text-align: center; */

    /* Semi-transparent background */
    background-color: rgba(0, 0, 0, 0.55);
}

.h1 {
    font-size: calc(1.0em + 2.5vw);
    font-weight: 700;
    line-height: 1.5;
    letter-spacing: 0.02em;
    color: #fff;
    text-align: center;
    text-shadow: 0.05em 0.05em 0.05em rgba(0, 0, 0, 0.4);
}

main {
    padding: 5em 2em;

}

.h2 {
    font-size: calc(3em + 0.2vw);
    font-weight: 600;
    text-align: center;
    margin: 1.2em 0;
    color: #111;
}

/* .p {
    font-size: calc(2em + 0.2vw);
    font-weight: 400;
    line-height: 2;
    color: #222;
} */

::-moz-selection {
    background-color: rgba(0, 0, 0, 0.75);
    color: #fff;

}

::selection {
    background-color: rgba(0, 0, 0, 0.75);
    color: #fff;
}

</style>


<header>

	<!-- Video from coverr.co -->
	<video class="video-bg" autoplay muted loop>
		<source src="assets/img/st43.mp4" type="video/mp4" />

	</video>

	<div class="video-overlay ">
	<div class="container ">
        <div class="row">

            <div class="col-lg-2">
              <img src="assets/img/logo.png" alt="" width="60" height="130">
            </div>
            <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg navbar-dark" style="margin-top: 4%;">
                <div class="container-fluid">
       
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main/index"><button type="button" class="btn btn-outline-light">ГЛАВНАЯ</button></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="main/index#aboutus"><button type="button" class="btn btn-outline-light">О БИЗНЕСЕ - ШКОЛА</button></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="main/index#cours"><button type="button" class="btn btn-outline-light">КУРСЫ</button></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="login/index"><button type="button" class="btn btn-outline-light">АВТОРИЗАЦИЯ</button></a>
                        </li>
                      
                    </ul>
                    </div>
                </div>
                </nav>
            </div>
            <div class="col-lg-4">
            <div class="" style="color: white; margin-top: 5%;">
<span>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
</svg> &nbsp; &nbsp; 8 (863) 240-97-11

</span>&nbsp;&nbsp;
<span>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
<path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
<path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
</svg>
&nbsp; &nbsp; bs-kontrakt@yandex.ru
</span> <br>
<span>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
</svg>  &nbsp; &nbsp; Ростовская область, г. Новочеркасск, пр-кт Платовский, д. 116
</span>
</div>
            </div>
           
        </div>
    </div>

<h1 class="h1"> Международная инклюзивная академия образовательный центр</h1>
	</div>

</header>

<main>
