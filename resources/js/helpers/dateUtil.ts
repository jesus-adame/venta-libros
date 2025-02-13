export const dateFormat = (dateTime: Date | string): string => {
    if (typeof dateTime === 'string') {
        dateTime = new Date(Date.parse(dateTime));
    }

    return dateTime.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    }).replace(/\//g, '/');
};
