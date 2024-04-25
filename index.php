<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HamsterLand</title>
    <!-- Linking to Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/dist/cdn.min.js" defer></script>
    <script src="main.js"></script>
</head>

<body>
<!-- Content Section -->
<section class="section">
    <div class="container">
        <h1 class="title">
            Welcome to HamsterLand
        </h1>
        <div class="navbar navbar-start">
            <a href="index.php?page=addlead">Add lead</a> |
            <a href="index.php?page=getstatuses">See statuses</a>
        </div>


        <?php if (!isset($_GET['page']) || $_GET['page'] === 'addlead'): ?>
            <div x-data="addleadComponent">
                <form action="#" method="post">
                <div class="field">
                    <label class="label">First Name</label>
                    <div class="control">
                        <input x-model="lead.firstName" class="input" type="text" name="firstName" placeholder="Enter your first name" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Last Name</label>
                    <div class="control">
                        <input x-model="lead.lastName" class="input" type="text" name="lastName" placeholder="Enter your last name" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <input x-model="lead.phone" class="input" type="tel" name="phone" placeholder="Enter your phone number" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input x-model="lead.email" class="input" type="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button @click="sendMessage" class="button is-primary" type="button">Submit</button>
                    </div>
                </div>

                </form>
            </div>
        <?php elseif (isset($_GET['page']) && $_GET['page'] === 'getstatuses'): ?>
            <div x-data="getstatusesComponent" x-init="getStatuses">
                <div>
                    <span>start date</span><input x-model="start" type="date" name="start" title="Enter startDate" placeholder="Enter startDate">
                    <span>end date</span><input x-model="end" type="date" name="end" title="Enter endDate" placeholder="Enter endDate">
                    <button @click="getStatuses">refresh statuses</button>
                </div>
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
                    <template x-for="status in statuses">
                    <tr>
                        <td><span x-text="status.id"></span></td>
                        <td><span x-text="status.email"></span></td>
                        <td><span class="tag" x-text="status.status ? 'Active' : 'Inactive'"></span></td>
                        <td><span x-text="status.ftd===1 ? 'Yes' : 'No'"></span></td>
                    </tr>
                    </template>
                    </tbody>
                </table>

            </div>

        <?php endif; ?>
    </div>
</section>
</body>
</html>
