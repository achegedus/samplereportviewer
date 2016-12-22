export const apiDomain = 'http://localhost:8889'

export const apiReportList = apiDomain + '/api/v1/reports'


export const getHeader = function () {
    const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
    const headers = {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + tokenData.id_token
    }

    return headers
}