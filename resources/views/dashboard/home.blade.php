@extends('dashboard.layout.mainuser')

@section('containerr')
   
    <div class="container">
        <div class="content">
            <h1>Diagnosa online kapan pun dan di mana pun.</h1>
            <p>Anda dapat mendiagnosa penyakit kambing anda secara online disini bersama kami., </p>
            <div class="buttons">
                <button onclick="window.location.href='{{ url('diagnosa') }}'" class="btn-primary">Diagnosa</button>
            </div>
        </div>
        <div class="image">
            <img src="https://cms.disway.id/uploads/e38abd9f64bccd00bfccd6d08204ead8.jpg" alt="Woman with dog" />
        </div>
    </div>
    <div class="promo-bar">
        <p>&copy; 2024. All rights reserved.</p>
    </div>
    <style>
                
                body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #F0F8FF; 
            }

            .container {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                padding: 50px 20px; 
                background-color: #E6F2FF;
            }

            .content {
                max-width: 100%;
                text-align: center; 
                margin-bottom: 20px;
            }

            h1 {
                color: #002366; 
                font-size: 36px; 
                margin: 0;
            }

            p {
                color: #002366; 
                font-size: 16px; 
                margin: 20px 0;
            }

            .buttons {
                margin-top: 20px;
            }

            .btn-primary {
                background-color: #007BFF; 
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                margin-right: 10px;
            }

            .image img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
            }

            .promo-bar {
                background-color: #007BFF; 
                color: white;
                text-align: center;
                padding: 10px;
                width: 100%;
            }

            .promo-bar p {
                margin: 0;
                font-size: 16px; 
            }

            .promo-btn {
                background-color: white;
                color: #007BFF;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                margin-left: 20px;
            }

            @media (min-width: 768px) {
     

                .container {
                    flex-direction: row;
                    padding: 50px;
                }

                .content {
                    max-width: 50%;
                    text-align: left;
                }

                h1 {
                    font-size: 48px;
                }

                p {
                    font-size: 18px;
                }

                .btn-primary {
                    padding: 15px 30px;
                    font-size: 18px;
                }

                .promo-bar {
                    padding: 20px;
                }

                .promo-bar p {
                    font-size: 18px;
                }           
                
             }
     </style>
    

    @endsection
