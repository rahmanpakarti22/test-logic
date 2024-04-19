@extends('layout.tamplate')

@section('konten')

<form method="post" action="{{url('hitungpajak')}}">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="taxStatus" class="col-sm-2 col-form-label">Tax Type</label>
            <div class="col-sm-10">
                <select class="form-control" name="taxStatus" id="taxStatus">
                    <option value="TK0" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK0' ? 'selected' : ''; ?>>TK0</option>
                    <option value="TK1" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK1' ? 'selected' : ''; ?>>TK1</option>
                    <option value="TK2" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK2' ? 'selected' : ''; ?>>TK2</option>
                    <option value="TK3" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'TK3' ? 'selected' : ''; ?>>TK3</option>
                    <option value="K0" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K0' ? 'selected' : ''; ?>>K0</option>
                    <option value="K1" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K1' ? 'selected' : ''; ?>>K1</option>
                    <option value="K2" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K2' ? 'selected' : ''; ?>>K2</option>
                    <option value="K3" <?php echo isset($_POST['taxStatus']) && $_POST['taxStatus'] == 'K3' ? 'selected' : ''; ?>>K3</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="salary" class="col-sm-2 col-form-label">Salary</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="salary" id="salary" required value="<?php echo isset($_POST['salary']) ? $_POST['salary'] : ''; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tax" class="col-sm-2 col-form-label">Tax</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="totalTax" id="totalTax" readonly value="{{ isset($totalTax) ? $totalTax : '' }}">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary" name="submit">hitung</button>
            </div>
        </div>
    </div>
</form>

@endsection
