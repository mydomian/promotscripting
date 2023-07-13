<?php
$system = App\Models\Setting::first();
?>
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © <?php echo date('Y') ?> <a href="{{ URL::to('/') }}"
                                                                              target="_blank"><b>{{ $system->name }}</b></a>
    </p>
    <p class="text-muted"><b>{{ $system->name }}</b> <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>

</div>
</div>

@include('admin.layout.scripts')

</body>
</html>
