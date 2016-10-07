<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 07.10.16
 * Time: 16:55
 */
?>
@extends('admin.dashboard')

@section('content')
    <h2>Настройка уровня доступа</h2>
    <div class="uk-container uk-container-center">
        <div class="uk-accordion" data-uk-accordion="{collapse: false, showfirst: false}">
            <h3 class="uk-accordion-title">Добавить уровень доступа <i class="uk-icon-plus-circle uk-text-success"></i>
            </h3>
            <div class="uk-accordion-content">
                <div style="background: #fff;">
                    <div class="uk-form">
                        <fieldset data-uk-margin>
                            <legend> Добавление нового уровня доступа</legend>
                            <div class="uk-grid">
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Название</label>

                                    <div class="uk-form-controls">
                                        <input type="text" placeholder="Название">
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Ярлык</label>
                                    <div class="uk-form-controls">
                                        <input type="text" placeholder="Название">
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Описание</label>
                                    <div class="uk-form-controls">
                                        <textarea cols="" rows="" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-2">
                                    <label class="uk-form-label">Уровень доступа</label>
                                    <div class="uk-form-controls">
                                        <select>
                                            <option value="0">0</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="150">150</option>
                                            <option value="200">200</option>
                                            <option value="800">800</option>
                                            <option value="900">900</option>
                                        </select>
                                    </div>
                                    <div class="uk-form-controls">
                                        <label><input type="checkbox">Редактирование</label>
                                    </div>
                                </div>
                                <div class="uk-width-1-1">
                                    <div class="uk-text-center uk-form-controls">
                                        <button class="uk-button uk-button-danger"><i class="uk-icon-close"></i>
                                        </button>
                                        <button class="uk-button uk-button-success "><i class="uk-icon-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <h2>Список уровней доступа</h2>
            <div class="uk-overflow-container">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Ярлык</th>
                        <th>Уровень доступа</th>
                        <th>Редактировани</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>[[id]]</td>
                            <td>[[name]]</td>
                            <td>[[slug]]</td>
                            <td>[[access_level]]</td>
                            <td>[[access_edit]]</td>
                            <td>[[description]]</td>
                        </tr>
                    </tbody>
                </table>
        </div>

    </div>
@endsection