import { createSlice } from '@reduxjs/toolkit';
import type { PayloadAction } from '@reduxjs/toolkit';
import { Page, PageProps } from '@inertiajs/core';

// Define a type for the slice state
interface AppStoreState {
    appUserPanel: any;
};

// Define the initial state using that type
const initialState: AppStoreState = {
    appUserPanel: 'app',
};

// Define slice
export const appStoreSlice = createSlice({
  name: 'appStore',
  initialState,
  reducers: {
    setAppUserPanel: (state, action: PayloadAction<Page<PageProps>>) => {
        state.appUserPanel = action.payload.props?.userPanel ?? initialState.appUserPanel;
    }
  },
  extraReducers: (builder) => {
    //
  }
});

// Define export actions
export const { setAppUserPanel } = appStoreSlice.actions;

// Define export reducer
export default appStoreSlice.reducer;