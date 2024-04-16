<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <link rel="stylesheet" href="/dist/css/style.css">
    <script type="text/javascript" src="{{ asset('/dist/js/main.js') }}"></script>
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check" class="lb-check">
        <i class="fas fa-bars" id="btn-close-sidebar"></i>
    </label>
    <div class="sidebar">
        <header class="text-white">Project Manager</header>
        <ul class="p-0">
            <li><a href="#"><i class="fas fa-gauge p-2"></i>Dashboard</a></li>
            <li><a href="/"><i class="fas fa-house p-2"></i>Home</a></li>
            <li><a href="/dashboard/user"><i class="fas fa-user p-2"></i>User</a></li>
            <li><a href="/dashboard/company"><i class="fas fa-building p-2"></i>Company</a></li>
            <li><a href="#"><i class="fas fa-people-group p-2"></i>Department</a></li>
            <li><a href="#"><i class="fas fa-diagram-project p-2"></i>Project</a></li>
            <li><a href="/dashboard/country"><i class="fas fa-globe p-2"></i>Country</a></li>
        </ul>
    </div>
    <section class="content">
        @include('message.success_message')
        @include('message.error_message')
        <header class="content-header">
            <a href="#"><i class="fas fa-user me-1"></i>User</a>
        </header>
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                @yield('breadcrumb')
            </nav>
            @yield('main')
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
    new MultiSelectTag('roles')
    </script>
    <script>
    new MultiSelectTag('roles-update')
    </script>
    <script>
    const selectRowCheckBox = document.getElementById('select-row-check');
    const childRows = document.querySelectorAll('.child-row');
    const selectChildRowCheckBoxs = document.querySelectorAll('.select-child-row-checkbox');

    selectRowCheckBox.addEventListener('change', function() {
        selectChildRowCheckBoxs.forEach(selectChildRowCheckBox => {
            if (selectRowCheckBox.checked) {
                selectChildRowCheckBox.checked = true;
            } else {
                selectChildRowCheckBox.checked = false;
            }
        });

    });

    const modal = document.getElementById('modal');
    const btnAdd = document.getElementById('btn-add-department');
    const btnCancel = document.getElementById('btn-cancel-modal');

    btnAdd.onclick = function() {
        modal.style.display = 'flex';
    }

    btnCancel.onclick = function() {
        modal.style.display = 'none';
    }
    </script>
</body>

</html>