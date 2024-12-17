<div class="message">
    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>
</div><?php /**PATH D:\xampp\htdocs\horizontamil\projects\webapp\resources\views/admin/pages/message.blade.php ENDPATH**/ ?>