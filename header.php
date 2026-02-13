<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle ?? 'Mon Site'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    
    <style>
        /* Force le body à prendre toute la hauteur */
        html, body {
            height: 100%;
            margin: 0;
        }
        
        /* Utilise Flexbox pour coller le footer en bas */
        body {
            display: flex;
            flex-direction: column;
        }
        
        /* Le main prend tout l'espace disponible */
        main {
            flex: 1 0 auto;
        }
        
        /* Le footer reste en bas */
        footer {
            flex-shrink: 0;
        }
        h1 {
            margin-top: 80px;
            text-align: center;
        }
    </style>
</head>
<body>