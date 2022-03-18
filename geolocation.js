import { _, _all } from '../modules/selector.js'
import { sendRequest, sendRequestForSelect } from '../modules/fetching.js'

const idWorkplace = _('#formAbsenWorkplace').value

const karyawanSelect = {
  name: 'Karyawan',
  valKey: 'pin',
  optKey: 'nm_lengkap',
  element: _('#formAbsenKaryawan')
}

const date = new Date
const day = date.getDay()
const hour = String(date.getHours()).padStart(2, '0')
const minute = String(date.getMinutes()).padStart(2, '0')

if (day === 0 || day === 6) _('#selectLemburLibur').disabled = false

_('#formAbsenJam').value = `${hour}:${minute}`


_('#formAbsenKehadiran').addEventListener('change', (e) => {
  _('#formAbsenType').value = ''
  _('#formAbsenType').disabled = true
  _('#formAbsenJam').value = ''
  _('#formAbsenJam').disabled = true

  let kehadiran = _('#formAbsenKehadiran').value
  if (kehadiran === 'hadir' || kehadiran === 'dinas' || kehadiran === 'lembur_libur') {
    _('#formAbsenType').disabled = false
    _('#formAbsenJam').disabled = false

    const date = new Date
    const hour = String(date.getHours()).padStart(2, '0')
    const minute = String(date.getMinutes()).padStart(2, '0')

    _('#formAbsenJam').value = `${hour}:${minute}`
  } else {
    _('#formAbsenType').disabled = true
    _('#formAbsenKaryawan').disabled = false
    _('#formAbsenJam').disabled = true

    karyawanSelect.url = `/api/workplace/${idWorkplace}/absen-today?karyawan=not_absen`
    sendRequestForSelect(karyawanSelect)
  }
})

_('#formAbsenType').addEventListener('change', (e) => {
  if (_('#formAbsenType').value === 'absen_masuk') {
    if (_('#formAbsenKehadiran').value === 'lembur_libur') {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/lembur-today?karyawan=not_absen`
    } else if (_('#formAbsenKehadiran').value === 'dinas') {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/dinas-today?karyawan=not_absen`
    } else {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/absen-today?karyawan=not_absen`
    }
    sendRequestForSelect(karyawanSelect)
  } else {
    if (_('#formAbsenKehadiran').value === 'lembur_libur') {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/lembur-today?karyawan=has_absen`
    } else if (_('#formAbsenKehadiran').value === 'dinas') {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/dinas-today?karyawan=has_absen`
    } else {
      karyawanSelect.url = `/api/workplace/${idWorkplace}/absen-today?karyawan=has_absen`
    }
    sendRequestForSelect(karyawanSelect)
  }
  delete karyawanSelect.url
})

let originAbsenFile = _('#absenFilePreview').getAttribute('src')
_('#inputAbsenFile').addEventListener('change', (e) => {
  _('#inputAbsenFile').classList.remove('is-invalid')
  _('#formAbsenFileSumbit').disabled = false

  const fileAccepted = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']
  const file = e.target.files[0]
  if (file) {
    if (!fileAccepted.includes(file.type)) {
      _('#formAbsenFileSumbit').disabled = true
      return _('#inputAbsenFile').classList.add('is-invalid')
    }

    _('#absenFilePreview').setAttribute('src', URL.createObjectURL(file))
    _('#absenFilePreview').style.display = 'block'
  } else {
    _('#absenFilePreview').setAttribute('src', originAbsenFile)
  }
})

_('#cancelAbsenFile').addEventListener('click', (e) => {
  _('#inputAbsenFile').classList.remove('is-invalid')
  _('#formAbsenFile').value = ''
  _('#formAbsenFileSumbit').disabled = false
  _('#absenFilePreview').setAttribute('src', originAbsenFile)
  _('#absenFilePreview').style.display = 'none'
})

// add note modal
_('#absenNoteModal').addEventListener('shown.mdb.modal', (e) => _('#formAddNoteText').focus())

_('#absenNoteModal').addEventListener('hide.mdb.modal', (e) => {
  _('#inputNoteFile').classList.remove('is-invalid')
  _('#formAddNote').removeAttribute('action')
  _('#noteFilePreview').setAttribute('src', '/src/images/absen/default.png')
  _('#formAddNote').reset()
  _('#noteFilePreview').style.display = 'none'
})

_('#tableAbsensi tbody').addEventListener('click', (e) => {
  const idAbsenNote = e.target.dataset.idabsennote
  const idAbsenFile = e.target.dataset.idabsenfile

  if (idAbsenNote) createAbsenNoteModal(idAbsenNote)
  if (idAbsenFile) createAbsenFileModal(idAbsenFile)
})

async function createAbsenNoteModal(idAbsenNote) {
  _('#formAddNote').setAttribute('action', `/absensi/${idAbsenNote}`)

  const absen = await sendRequest(`/api/absensi/${idAbsenNote}`)
  if (absen.file) {
    _('#noteFilePreview').setAttribute('src', `/src/images/absen/${absen.file}`)
    _('#noteFilePreview').style.display = 'block'
  }
  _('#formAddNoteText').value = absen.note
}

let originNoteFile = _('#noteFilePreview').getAttribute('src')
_('#inputNoteFile').addEventListener('change', (e) => {
  _('#inputNoteFile').classList.remove('is-invalid')
  _('#formAddNoteSubmit').disabled = false

  const fileAccepted = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']
  const file = e.target.files[0]
  if (file) {
    if (!fileAccepted.includes(file.type)) {
      _('#formAddNoteSubmit').disabled = true
      return _('#inputNoteFile').classList.add('is-invalid')
    }

    _('#noteFilePreview').setAttribute('src', URL.createObjectURL(file))
    _('#noteFilePreview').style.display = 'block'
  } else {
    _('#noteFilePreview').setAttribute('src', originNoteFile)
  }
})

_('#cancelNoteFile').addEventListener('click', (e) => {
  _('#inputNoteFile').classList.remove('is-invalid')
  _('#formAddNoteFile').value = ''
  _('#formAddNoteSubmit').disabled = false
  _('#noteFilePreview').setAttribute('src', originNoteFile)
  _('#noteFilePreview').style.display = 'none'
})

async function createAbsenFileModal(idAbsenFile) {
  _('#formAddNote').setAttribute('action', `/absensi/${idAbsenFile}`)

  const absen = await sendRequest(`/api/absensi/${idAbsenFile}`)
  _('#fileImg').setAttribute('src', `/src/images/absen/${absen.file}`)
}

_('#showFileModal').addEventListener('hide.mdb.modal', (e) => {
  _('#fileImg').removeAttribute('src')
})

_('#detailLemburModal').addEventListener('hide.mdb.modal', (e) => {
  _('#detailLemburUraian').innerHTML = ''

  _('#formAccLembur').removeAttribute('action')
  _all('.btn-approval-lembur').forEach(btn => btn.disabled = true)
})

_('#tableLembur tbody').addEventListener('click', (e) => {
  const idDetailLembur = e.target.dataset.iddetaillembur
  if (idDetailLembur) detailLemburModal(idDetailLembur)
})

async function detailLemburModal(idLembur) {
  const lembur = await sendRequest(`/api/lembur/${idLembur}`)
  _('#detailLemburUraian').innerHTML = lembur.uraian

  if (lembur.approval === 'pending')
    _all('.btn-approval-lembur').forEach(btn => btn.disabled = false)

  if (lembur.approval === 'disetujui')
    _('#btnTolakLembur').disabled = false

  _('#formAccLembur').setAttribute('action', `/lembur/${idLembur}/approval`)
}
