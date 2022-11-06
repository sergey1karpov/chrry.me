<form action="{{ route('ordersSearch', ['id' => $user->id]) }}" method="GET"> @csrf
    <input class="form-control me-2 shadow" name="search" type="search" placeholder="Поиск..." aria-label="Search" style="border: 0">
    <label class="mt-2" style="font-size: 0.9rem">С помощью поиска вы можете найти обработанный вами заказ по имени заказчика или номеру заказа</label>
</form>


