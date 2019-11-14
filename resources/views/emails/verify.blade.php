<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
    @import '~bootstrap/scss/bootstrap';
    @import url('https://fonts.googleapis.com/css?family=Nunito');
    #outside {
        background-color: lightblue;
        width: 600px;
        height: 600px;
        border-radius: 40px;
        position: absolute;
        text-align: center;
    }
    
    #boatpanel {
        width: 50%;
        position: relative;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-style: solid;
        border-width: 1px;
        border-color: grey;
        border-radius: 30px;
        max-width: 700px;
    }

    @media (max-width: 768px) {
        #boatpanel {
            width: 90%;
        }
    }

    #head {
        color: black;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
    }

    #subhead {
        text-align: center;
    }

    #verifybutton {
        text-align: center;
    }
    .btn {
        padding: 14px 24px;
        border: 0 none;
        border-radius: 30px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    .btn:focus, .btn:active:focus, .btn.active:focus {
        outline: 0 none;
    }
    
    .btn-primary {
        background: #0099cc;
        color: #ffffff;
    }
    
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
        background: #33a6cc;
    }
    
    .btn-primary:active, .btn-primary.active {
        background: #007299;
        box-shadow: none;
    }

    </style>
</head>
<body>
<div id="outside">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; padding:0; margin:0px;">
        <tr>
            <td align="center" style="vertical-align:bottom; padding-top:130px;">
                <div id="boatpanel">
                    <header id="head" style="margin-top: auto; margin-bottom: auto;">Verify your registration of {{ $wordcombo->boat_name() }}!</header>
                    <h3 id="subhead" style="margin-left: 20px; margin-right: 20px;">You have until {{ $wordcombo->deadline }} before the name can be taken by someone else!</h3>
                    <form action="{{ config('app.url') }}/verify" method="get">
                        <input type="hidden" name="reservation" value={{ $wordcombo->reservation }}>
                        <button style="cursor: pointer;" id="verifybutton" type="submit" class="btn btn-primary" style="margin-bottom:30px;">Click here to verify!</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>