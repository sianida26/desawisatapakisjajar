// import React from 'react';
// import Box from '@mui/material/Box';
// import Table from '@mui/material/Table';
// import TableBody from '@mui/material/TableBody';
// import TableCell from '@mui/material/TableCell';
// import TableContainer from '@mui/material/TableContainer';
// import TableFooter from '@mui/material/TableFooter';
// import TablePagination from '@mui/material/TablePagination';
// import TableRow from '@mui/material/TableRow';
// import Paper from '@mui/material/Paper';
// import IconButton from '@mui/material/IconButton';
// import FirstPageIcon from '@mui/icons-material/FirstPage';
// import KeyboardArrowLeft from '@mui/icons-material/KeyboardArrowLeft';
// import KeyboardArrowRight from '@mui/icons-material/KeyboardArrowRight';
// import LastPageIcon from '@mui/icons-material/LastPage';

// interface IPaginationAction {
//   count: number,
//   page: number,
//   rowsPerPage: number,
//   onChangePage: Function,
// }

// function TablePaginationActions({ count, page, rowsPerPage, onChangePage }: IPaginationAction) {

//   const getNumberOfPages = (count: number, rowsPerPage: number) => count < rowsPerPage ? 1 : Math.floor(count/rowsPerPage)

//   const handleFirstPageButtonClick = () => {
//       onChangePage(1);
//   };

//   // RDT uses page index starting at 1, MUI starts at 0x
//   // i.e. page prop will be off by one here
//   const handleBackButtonClick = () => {
//       onChangePage(page);
//   };

//   const handleNextButtonClick = () => {
//       onChangePage(page + 2);
//   };

//   const handleLastPageButtonClick = () => {
//       onChangePage(getNumberOfPages(count, rowsPerPage));
//   };

//   return (
//       <>
//           <IconButton onClick={handleFirstPageButtonClick} disabled={page === 0} aria-label="first page">
//               <FirstPageIcon />
//           </IconButton>
//           <IconButton onClick={handleBackButtonClick} disabled={page === 0} aria-label="previous page">
//               <KeyboardArrowLeft />
//           </IconButton>
//           <IconButton
//               onClick={handleNextButtonClick}
//               disabled={page >= getNumberOfPages(count, rowsPerPage) - 1}
//               aria-label="next page"
//           >
//               <KeyboardArrowRight />
//           </IconButton>
//           <IconButton
//               onClick={handleLastPageButtonClick}
//               disabled={page >= getNumberOfPages(count, rowsPerPage) - 1}
//               aria-label="last page"
//           >
//               <LastPageIcon />
//           </IconButton>
//       </>
//   );
// }

// const CustomMaterialPagination = ({ rowsPerPage, rowCount, onChangePage, onChangeRowsPerPage, currentPage }: any) => (
//   <TablePagination
//       component="nav"
//       count={rowCount}
//       rowsPerPage={rowsPerPage}
//       page={currentPage - 1}
//       onChangePage={onChangePage}
//       onChangeRowsPerPage={({ target }:any) => onChangeRowsPerPage(Number(target.value))}
//       // ActionsComponent={TablePaginationActions}
//   />
// );

// export default CustomMaterialPagination