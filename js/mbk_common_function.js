function checkRequired(requiredFields) {
    for (i in requiredFields) {
        if ($('#' + requiredFields[i]).val() == '' || $('#' + requiredFields[i]).val() == null) {
            return requiredFields[i];
        }
    }
    return true;
}