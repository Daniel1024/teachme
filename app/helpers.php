<?php
/**
 * @return TeachMe\Entities\User
 */
function user() {
    return auth()->user();
}