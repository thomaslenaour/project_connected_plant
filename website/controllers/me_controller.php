<?php

if (isConnected()) {
    
}
else {
    header('Location: ./?error=1');
    exit;
}