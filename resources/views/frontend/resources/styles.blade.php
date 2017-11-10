<link rel="stylesheet" href="/css/component.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.0/jquery.fancybox.min.css" />
<style media="screen">
    /*Map*/
    #map {
      width: 100%;
      height: 400px;
    }
    /*End map*/
    /*Save & cancel*/
    .btn-success {
        font-size: large;
    }
    .btn-danger {
        font-size: large;
    }
    /*End save and cancel*/
    /*Acquired Features*/
    #acquired-features h5 {
        color: #ddd;
    }
    .feature {
        position: relative;
    }
    .delete-feature {
        position: absolute;
        left: 0;
    }
    .fa-times-circle {
        color: #ef6161;
        cursor: pointer;
    }
    .fa-times-circle:hover {
        font-size: 20px;
    }
    /*End Acquired Features*/
    /*Photos*/
    .photos {
        text-align: center;
    }
    .gallery {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }
    .single-photo {
        max-height: 100px;
        margin: 5px 0;
        border: 2px solid #ffc0cb;
    }
    .delete-photo {
        left: 5px;
        top: 10px;
        position: absolute;
    }
    .gallery .cover {
        position: absolute;
        right: -20px;
        top: 15px;
        transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        padding: 0 25px;
        background-color: #008000;
        color: #fff;
        font-size: 0.7em;
    }
    /*End Photos*/
    /*Availablilities*/
    .single-availability {
        position: relative;
    }
    .delete-avail {
        position: absolute;
        left: 0;
    }
    /*End Availablilities*/
</style>
