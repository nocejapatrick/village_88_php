<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey - Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            max-width: 800px;
            margin:40px auto;
            padding:40px;
            box-shadow: 0px 2px 9px #0000003d;
        }
        form label{
            width: 30%;
            display: block;
            text-align: right;
            font-size: .87em;
        }
        form input, form select{
            width: 50%;
            padding: 5px;
        }
        .btn{
            width: auto;
        }
        .form-group{
            margin-top:10px;
        }
        .form-group > *{
            display: inline-block;
        }
        .btn{
            border: none;
            padding:5px 15px;
            background: #78dbf9;
            font-size: .9em;
            cursor: pointer;
        }

        .form-group > textarea{
            vertical-align: middle;
        }

        .error{
            background: #fd6666;
            width: 50%;
            padding:7px 12px;
            color: #861717;
            font-size: .8em;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="result.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="dojo_location">Dojo Location:</label>
                <select name="dojo_location" id="dojo_location">
                    <option value="Mountain View">Mountain View</option>
                    <option value="Beach View">Beach View</option>
                    <option value="Sky View">Sky View</option>
                </select>
            </div>
            <div class="form-group">
                <label for="favorite_language">Favorite Language:</label>
                <select name="favorite_language" id="favorite_language">
                    <option value="Javascript">Javascript</option>
                    <option value="Phyton">Phyton</option>
                    <option value="C#">C#</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment (optional)</label>
                <textarea name="comment" id="" cols="30" rows="10"></textarea>
            </div>
            <!-- <div class="form-group">
                <label for=""></label>
                <p class="error">Kindly check require inputs.</p>
            </div> -->
            <div class="form-group">
                <label></label>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
           
        </form>
    </div>
</body>
</html>