<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $contract_id = contract_to_sign($id);
    $new_id = $contract_id['id'];
    
    $log->info($new_id);
    $log->warning($id);
    include_once 'partials/content_start.php';
?>
<main>
    <div class="info-collect">
        <h2>Upload Contract</h2>
        <div class="form-container">
            <form action="index.php?page=contracts/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $contract_id['id']; ?>">
                <div class="form-group">
                    <label for="signature">Signature</label>
                    <input type="file" name="signature">
                </div>
                <div class="form-group">
                    <button type="submit">Upload Signature</button>
                </div>
            </form>
        </div>
    </div>
</main>