<style>
    /* body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        box-sizing: border-box;
        box-shadow: #1c3433;
    }

    .container {
        max-width: 1000px;
        margin: 0px auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: rgb(215, 47, 47);
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
        text-shadow: 2px 5px 7px;
        text-transform: uppercase;
        padding: 10px 10px 30px 10px;
    }

    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap; /* Enable wrapping on smaller screens */
    /* gap: 20px;
    }

    .col-md-4 {
        flex: 1;
        max-width: calc(50% - 20px); /* Two columns on larger screens */
    /* margin: 5px;
        background-color: lightblue;
        color: rgb(76, 17, 65);
        border-radius: 15px;
        font-weight: bold;
        font-size: 1.2em;
        box-sizing: border-box;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .card-subtitle {
        color: #666;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 0.875rem;
        color: #444;
    }*/

    /* Media queries for responsive design
    @media screen and (max-width: 768px) {
        .col-md-4 {
            max-width: 100%; /
        }
    }
*/










    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        box-sizing: border-box;
        box-shadow: #1c3433;
    }

    .container {
        max-width: 1000px;
        margin: 0px auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: rgb(215, 47, 47);
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
        text-shadow: 2px 5px 7px;
        text-transform: uppercase;
        padding: 10px 10px 30px 10px;
    }

    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        /* Enable wrapping on smaller screens */
        gap: 20px;
    }

    .col-md-4 {
        flex: 1;
        max-width: calc(50% - 20px);
        /* Two columns on larger screens */
        margin: 5px;
        background-color: lightblue;
        color: rgb(76, 17, 65);
        border-radius: 15px;
        font-weight: bold;
        font-size: 1.2em;
        box-sizing: border-box;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .card-subtitle {
        color: #666;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 0.875rem;
        color: #444;
    }

    /* Media queries for responsive design */
    @media screen and (max-width: 768px) {
        .col-md-4 {
            max-width: 100%;
        }

        .container {
            padding: 10px;
        }

        h1 {
            font-size: 18px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .card-subtitle,
        .card-text {
            font-size: 0.8rem;
        }
    }
</style>
</head>

<body>
    <div class="container">
        <h1>About Us</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/images/student.jpg') }}" class="card-img-top" alt="picture">
                    <div class="card-body">
                        <h5 class="card-title">Hamidi</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Full Stack Web Developer</h6>
                        <p class="card-text ">Aspiring Junior Full Stack Web Developer with a passion for coding and
                            a strong foundation in HTML, CSS, JavaScript, Angular, and Laravel.
                            Seeking an opportunity to contribute to dynamic web development
                            projects and grow as a professional in a collaborative.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/images/vadimSquirrel.jpg') }}" class="card-img-top" alt="picture">
                    <div class="card-body">
                        <h5 class="card-title">Vadim</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Full Stack Web Developer</h6>
                        <p class="card-text">Passionate Full-Stack Web Developer graduate with a background in factory
                            and earthwork fields. Proficient in all aspects of web development, from HTML to database
                            management. Eager to launch my career as a junior developer in a dynamic team.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/images/estherSquirrel.jpg') }}" class="card-img-top" alt="picture">
                    <div class="card-body">
                        <h5 class="card-title">Esther</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Full Stack Web Developer</h6>
                        <p class="card-text">Open-minded and Creative Full Stack web developer with verbal
                            and written communication skills. I possess a diverse skill set and
                            expertise in a variety of programming languages, frameworks, and
                            technologies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/images/azizullah.jpg') }}" class="card-img-top" alt="picture">
                    <div class="card-body">
                        <h5 class="card-title">Azizullah</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Full Stack Web Developer</h6>
                        <p class="card-text">Results-driven professional with over 12 years of Sourcing and
                            approximately 4 years of Market Development experience. Recently completed
                            an intensive four-month Full Stack Web Development boot camp, gaining expertise in various
                            web development technologies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/images/admin.jpg') }}" class="card-img-top" alt="picture">
                    <div class="card-body">
                        <h5 class="card-title">Dennis</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Full Stack Web Developer</h6>
                        <p class="card-text">An adaptable professional with a proven career transformation form logistics to a dynamics and role as a junior dev. I have seamly transitioned to the world of technology. I bring a unique problem solving approach to software  development..</p>
                    </div>
                </div>
            </div>
            <!-- Repeat the above card structure for other developers -->
        </div>
    </div>
</body>
