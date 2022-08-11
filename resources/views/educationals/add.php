<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>


        <header class="w3-padding">

            <h1 class="w3-text-blue">Portfolio Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Portfolio</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Add Education</h2>

            <form method="post" action="/console/educationals/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="credential">Credential:</label>
                    <input type="credential" name="credential" id="credential" value="<?= old('credential') ?>" required>
                    
                    <?php if($errors->first('credential')): ?>
                        <br>
                        <span class="w3-text-blue"><?= $errors->first('credential'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="institution">Institution:</label>
                    <input type="institution" name="institution" id="institution" value="<?= old('institution') ?>">

                    <?php if($errors->first('institution')): ?>
                        <br>
                        <span class="w3-text-blue"><?= $errors->first('institution'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="year">Year:</label>
                    <input type="number" name="year" id="year" value="<?= old('year') ?>" required>

                    <?php if($errors->first('year')): ?>
                        <br>
                        <span class="w3-text-blue"><?= $errors->first('year'); ?></span>
                    <?php endif; ?>
                </div>



                <button type="submit" class="w3-button w3-green">Add Education</button>

            </form>

            <a href="/console/educationals/list">Back to Education List</a>

        </section>

    </body>
</html>