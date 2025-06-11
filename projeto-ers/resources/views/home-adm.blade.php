@extends('layout')
@section('principal')

@push('styles')
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">
@endpush

<div class="admin-container">
    
    <h1 class="admin-header">Bem-vindo, administrador {{ Auth::user()->name }}!</h1>

    <ul class="report-list">
        <li><a href="/relatoriovendas">Gerar Relatório de Vendas</a></li>
        <li><a href="/relatorioclientes">Gerar Relatório de Clientes</a></li>
    </ul>
</div>

<h2 class="admin-subheader">Gráfico de Estoque</h2>
<div class="chart-wrapper width: 100%; height: 60%;">
    <canvas id="graficoEstoque"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        const ctx = document.getElementById('graficoEstoque').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($produtos->pluck('nome')) !!},
                datasets: [{
                    label: 'Unidades em Estoque',
                    data: {!! json_encode($produtos->pluck('qtde_estoque')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection