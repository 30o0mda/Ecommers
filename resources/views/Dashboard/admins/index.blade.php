@extends('Dashboard.layout.master')
<style>
    .heading {
        padding: 0.5rem 2rem;
        background-color: #e58a0a34;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .heading h4 {
        font-family: "bold";
        font-size: 1rem;
        margin-bottom: 0
    }

    .text-titles {
        color: #0b445f94;
        font-family: "regular" !important;

    }

    .text-title {
        color: #e5890a;
    }

    .heading span {
        font-family: "regular";
        font-size: 0.9rem;
    }

    button.new-add {
        display: block;
        margin-inline-start: auto;
        margin-bottom: -42px;
    }

    div.dt-container div.dt-search {
        text-align: right;
        position: absolute;
        top: 10px;
        right: 577px;
    }


    .table>:not(:last-child)>:last-child>* {
        border-bottom-color: currentColor;
        text-align: center;
    }

    table.table.dataTable.table-striped>tbody>tr:nth-of-type(2n+1)>* {
        text-align: center;
    }

    .new-add {
        position: relative;
        z-index: 11;
    }

    table.table.dataTable> :not(caption)>*>* {
        background-color: transparent;
        text-align: center;
    }

    .table_data {
        position: relative;
    }

    div.dt-container div.dt-paging ul.pagination {
        justify-content: center;
    }

    @media only screen and (max-width: 425px) {

        div.dt-container div.dt-search {
            position: relative !important;
            top: unset;
            right: unset;
        }
    }
</style>

@section('title', __('messages.admins'))
@section('content')
    <div class="index">
        <section class="content">
            <div class="fillter">
                <div class="select">
                    <a href="{{ route('admins.create') }}" class="new-add">
                        <i class="fa-solid fa-square-plus"></i></a>
                </div>
            </div>
            <div class="table_data">
                <div class="table-responsive mt-1">
                    {!! $dataTable->table(
                        [
                            'class' => 'table_expenses table_topic table table-striped table-bordered',
                        ],
                        true,
                    ) !!}
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{ $dataTable->scripts() }}
@endsection
