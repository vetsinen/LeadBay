<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulma CSS Navigation</title>
    <!-- Linking to Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/dist/cdn.min.js" defer></script>
    <script src="main.js"></script>
</head>

<body>
<!-- Navigation Bar -->
        <div class="navbar-start">
            <a class="navbar-item" href="index.php?page=addlead">
                add lead
            </a>

            <a class="navbar-item" href="index.php?page=getstatuses">
                get statuses
            </a>
        </div>


<!-- Content Section -->
<section class="section">
    <div class="container">
        <h1 class="title">
            Welcome to LeadBay
        </h1>
        <?php if (!isset($_GET['page']) || $_GET['page'] === 'addlead'): ?>
            <p>page is not defined, so switching to form</p>
            <form action="#" method="post">

                <!-- First Name Field -->
                <div class="field">
                    <label class="label">First Name</label>
                    <div class="control">
                        <input class="input" type="text" name="firstName" placeholder="Enter your first name" required>
                    </div>
                </div>

                <!-- Last Name Field -->
                <div class="field">
                    <label class="label">Last Name</label>
                    <div class="control">
                        <input class="input" type="text" name="lastName" placeholder="Enter your last name" required>
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input class="input" type="tel" name="phone" placeholder="Enter your phone number" required>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        <?php elseif (isset($_GET['page']) && $_GET['page'] === 'getstatuses'): ?>
            <p> lets review leads statuses</p>
            <div x-data="getstatuses">
                <span x-text="greeting"></span>
                <table class=" table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>FTD</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>example1@example.com</td>
                        <td><span class="tag is-success">Active</span></td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>example2@example.com</td>
                        <td><span class="tag is-danger">Inactive</span></td>
                        <td>No</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>
</body>
</html>
