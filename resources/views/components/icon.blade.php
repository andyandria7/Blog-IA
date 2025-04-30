<!-- resources/views/components/icon.blade.php -->
@if ($type === 'home')
    <i class="fas fa-home"></i>
@elseif ($type === 'user')
    <i class="fas fa-user"></i>
@elseif ($type === 'settings')
    <i class="fas fa-cog"></i>
@endif
