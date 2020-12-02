<?php
    echo 	("
            <html>
                <head></head>
                <body>
                    <script src='/TCC/assets/jquery/sweetalert2/sweetalert2.js'></script>

                    <script>
                        
                        Swal.fire({
                            title: 				'".$titulo."',
                            text: 				'".$msg."',
                            icon: 				'".$icone."',
                            confirmButtonText: 	'"."Ok"."'

                            }).then((result) => {

                                if (result.isConfirmed) {
                                    window.location.href='".$location."'
                                } 

                        });
                    </script>
                </body>
            </html>
            ");
?>