<form action="{{ route('ordersSearch', ['id' => $user->id]) }}" method="GET"> @csrf
    <input class="form-control me-2 shadow" name="search" type="search" placeholder="Поиск..." aria-label="Search" style="border: 0">
    <label class="mt-2" style="font-size: 0.9rem">С помощью поиска вы можете найти обработанный вами заказ по имени заказчика или номеру заказа</label>
</form>

@if(count($user->orders) > 0)
    <label class="mt-2" style="font-size: 0.9rem">Общее кол-во записей в базе - {{count($user->orders)}}</label>

    <form class="mt-2" action="{{ route('export', ['id' => $user->id]) }}" method="GET"> @csrf
        <input type="hidden" value="{{$user->id}}" name="user">
        <select class="form-select shadow" aria-label="Default select example" name="format" style="border: 0">
            <option value="xlsx">XLSX</option>
            <option value="csv">CSV</option>
            <option value="tsv">TSV</option>
            <option value="ods">ODS</option>
            <option value="xls">XLS</option>
        </select>
        <div class="form-check form-switch mt-2 mb-2">
            <input class="form-check-input shadow" type="checkbox" role="switch" name="email" id="flexSwitchCheckDefault" style="border: 0">
            <label style="font-size: 0.9rem" class="form-check-label" for="flexSwitchCheckDefault">Email</label>
        </div>
        <div class="form-check form-switch mt-2 mb-2">
            <input class="form-check-input shadow" type="checkbox" role="switch" name="phone" id="flexSwitchCheckDefault" style="border: 0">
            <label style="font-size: 0.9rem" class="form-check-label" for="flexSwitchCheckDefault">Телефон</label>
        </div>
        <div class="form-check form-switch mt-2 mb-2">
            <input class="form-check-input shadow" type="checkbox" role="switch" name="viber" id="flexSwitchCheckDefault" style="border: 0">
            <label style="font-size: 0.9rem" class="form-check-label" for="flexSwitchCheckDefault">Viber</label>
        </div>
        <div class="form-check form-switch mt-2 mb-2">
            <input class="form-check-input shadow" type="checkbox" role="switch" name="whatsapp" id="flexSwitchCheckDefault" style="border: 0">
            <label style="font-size: 0.9rem" class="form-check-label" for="flexSwitchCheckDefault">WhatsApp</label>
        </div>
        <div class="form-check form-switch mt-2 mb-2">
            <input class="form-check-input shadow" type="checkbox" role="switch" name="telegram" id="flexSwitchCheckDefault" style="border: 0">
            <label style="font-size: 0.9rem" class="form-check-label" for="flexSwitchCheckDefault">Telegram</label>
        </div>
        <label class="mt-2 mb-2" style="font-size: 0.9rem">Все кто делал у вас заказ, попадают в вашу базу данных. Всех своих своих клиентов
        вы можете экспортировать в одном из предложенных выше формате и дальше работать с ними. В файле содержиться Имя\Фамилия клиента и его контактные данные</label>
        <div class="d-grid gap-2">
            <button class="btn btn-secondary" type="submit">Экспорт</button>
        </div>
    </form>
@endif

