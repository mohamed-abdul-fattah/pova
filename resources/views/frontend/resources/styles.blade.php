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
    .save-btn {
        font-size: large;
        color: #449d44;
    }
    .save-btn:hover {
        color: #fff;
        border-color: #398439;
        background-color: #449d44;
    }
    .cancel-btn {
        font-size: large;
        color: #d9534f;
    }
    .cancel-btn:hover {
        color: #fff;
        border-color: #ac2925;
        background-color: #c9302c;
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
    }
    .single-photo {
        max-height: 100px;
        margin: 5px 0;
        border: 2px solid #ffc0cb;
    }
    .delete-photo {
        left: 10px;
        bottom: 45px;
        position: absolute;
    }
    /*End Photos*/
</style>
