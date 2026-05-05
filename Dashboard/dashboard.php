<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .sidebar {
            height: 100vh;
            background: #4b0f16;
            color: white;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #7a1b26;
        }

        .navbar {
            background: #4b0f16;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-dark px-3">
        <span class="navbar-brand">Perisa's Library</span>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2 sidebar p-3">
                <h4>Menu</h4>
                <a href="?page=dashboard">Dashboard</a>
                <a href="?page=users">Users</a>
            </div>

            <div class="col-md-10 p-4">

                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

                if ($page == 'dashboard') {
                    ?>

                    <h3>Dashboard</h3>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'];
                            unset($_SESSION['success']); ?>
                        </div>
                    <?php } ?>

                    <div class="card p-3">
                        <h1>Selamat Datang, <?= $user['nama'] ?>!</h1>
                        <br /> <br /> <br />
                        <p class="text-success">Anda telah berhasil login ke dalam sistem.</p>
                    </div>

                <?php } elseif ($page == 'users') { ?>

                    <h3>Data Users</h3>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'];
                            unset($_SESSION['success']); ?>
                        </div>
                    <?php } ?>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary" onclick="openAddModal()">
                            + Tambah User
                        </button>
                    </div>
                    <div class="card p-3">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                while ($row = mysqli_fetch_assoc($users)) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= str_repeat('*', 8) ?></td>
                                        <td><?= $row['no_hp'] ?></td>
                                        <td>

                                            <button class="btn btn-warning btn-sm"
                                                onclick="openEditModal(<?= $row['id'] ?>,'<?= $row['nama'] ?>','<?= $row['email'] ?>','<?= $row['no_hp'] ?>')">
                                                Edit
                                            </button>

                                            <button class="btn btn-danger btn-sm" onclick="openDeleteModal(<?= $row['id'] ?>)">
                                                Hapus
                                            </button>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                <?php } ?>

            </div>

        </div>

        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="tambah_user.php" method="POST">

                        <div class="modal-header">
                            <h5 class="modal-title">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="update_user.php" method="POST">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <input type="hidden" name="id" id="edit_id">

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" id="edit_nohp" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Password Baru (opsional)</label>
                                <input type="password" name="password" class="form-control">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="hapus_user.php" method="POST">

                    <div class="modal-header">
                        <h5>Hapus User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id">

                        <p>Yakin mau hapus user ini?</p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger">Hapus</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function openAddModal() {
            var modal = new bootstrap.Modal(document.getElementById('addModal'));
            modal.show();
        }

        function openEditModal(id, nama, email, nohp) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_nohp').value = nohp;

            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }

        function openDeleteModal(id) {
            document.getElementById('delete_id').value = id;

            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }
    </script>

</body>

</html>
